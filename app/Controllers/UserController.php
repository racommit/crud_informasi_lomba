<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;
use \Myth\Auth\Models\GroupModel;
use \Myth\Auth\Password;
use \Myth\Auth\Config\Auth as AuthConfig;
use \Myth\Auth\Entities\User;

class UserController extends BaseController
{
    protected $auth;

    protected $config;

    public function __construct()
    {
        $this->config = config('Auth');
        $this->auth = service('authentication');
    }

    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->findAll();

        $groupModel = new GroupModel();

        foreach ($data['users'] as $row) {
            $dataRow['group'] = $groupModel->getGroupsForUser($row->id);
            $dataRow['row'] = $row;
            $data['row' . $row->id] = view('row', $dataRow);
        }

        $data['groups'] = $groupModel->findAll();

        $data['title'] = 'Users';
        return view('InfoUser', $data);
    }

    public function activate()
    {
        $userModel = new UserModel();

        $data = [
            'activate_hash' => null,
            'active' => $this->request->getVar('active') == '0' || '' ? '1' : '0',
        ];
        $userModel->update($this->request->getVar('id'), $data);

        return redirect()->to(base_url('/InfoUser'));
    }

    public function changePassword($id = null)
    {
        if ($id == null) {
            return redirect()->to(base_url('/InfoUser'));
        } else {
            $data = [
                'id' => $id,
                'title' => 'Update Password',
            ];
            return view('setPassword', $data);
        }
    }

    public function setPassword()
    {
        $id = $this->request->getVar('id');
        // var_dump($id);die;
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('notification', [
                'type' => 'success',
                'message' => 'Data gagal diubah '
            ]);
            $data = [
                'id' => $id,
                'title' => 'Update Password',
                'validation' => $this->validator,
                'notification' => session()->getFlashdata('notification')
            ];

            return redirect()->to(base_url('/InfoUser'));
        } else {
            $userModel = new UserModel();
            $data = [
                'password_hash' => Password::hash($this->request->getVar('password')),
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null,
            ];
            $userModel->update($this->request->getVar('id'), $data);

            return redirect()->to(base_url('/InfoUser'));
        }
    }

    public function changeGroup()
    {
        $userId = $this->request->getVar('id');
        $groupId = $this->request->getVar('group');

        $groupModel = new GroupModel();
        $groupModel->removeUserFromAllGroups(intval($userId));

        $groupModel->addUserToGroup(intval($userId), intval($groupId));

        return redirect()->to(base_url('/InfoUser'));
    }

    public function save()
    {
        $users = model(UserModel::class);

        $rules = [
            'username' => 'required',
            'email'    => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $rules = [
            'password'     => 'required',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (!empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        
            $activator = service('activator');
            $sent = $activator->send($user);

            if (!$sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->to(base_url('/InfoUser'));
        

     
        
    }
}
