<?php

namespace app\controller\Admin;

use support\Request;
use app\service\Admin\AdminPermissionService;
use Throwable;
use app\util\ResponseTrait;
use support\Db;


class AdminPermissionController
{

    use ResponseTrait;

    public function getList(Request $request)
    {
        try {
            $where = [];
            $page = parameterCheck($request->input('page'), 'int', 0);
            $pageSize = parameterCheck($request->input('pageSize'), 'int', 0);

            $where['component'] = parameterCheck($request->input('component'), 'string', '');
            $where['hidden'] = parameterCheck($request->input('hidden'), 'int', 0);
            $where['icon'] = parameterCheck($request->input('icon'), 'string', '');
            $where['is_menu'] = parameterCheck($request->input('is_menu'), 'int', 0);
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);
            $where['path'] = parameterCheck($request->input('path'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);

            $data = AdminPermissionService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $where = [];

            $where['component'] = parameterCheck($request->input('component'), 'string', '');
            $where['hidden'] = parameterCheck($request->input('hidden'), 'int', 0);
            $where['icon'] = parameterCheck($request->input('icon'), 'string', '');
            $where['is_menu'] = parameterCheck($request->input('is_menu'), 'int', 0);
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);
            $where['path'] = parameterCheck($request->input('path'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);


            $data = AdminPermissionService::getAll($where);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getOne(Request $request)
    {
        try {
            $where = [];

            $where['id'] = parameterCheck($request->input('id'), 'int', 0);

            $data = AdminPermissionService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add(Request $request)
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['component'] = parameterCheck($request->input('component'), 'string', '');
            $where['hidden'] = parameterCheck($request->input('hidden'), 'int', 0);
            $where['icon'] = parameterCheck($request->input('icon'), 'string', '');
            $where['is_menu'] = parameterCheck($request->input('is_menu'), 'int', 0);
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);
            $where['path'] = parameterCheck($request->input('path'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);

            $data = AdminPermissionService::add($where);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function save(Request $request)
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($request->input('id'), 'int', 0);
            $where['component'] = parameterCheck($request->input('component'), 'string', '');
            $where['hidden'] = parameterCheck($request->input('hidden'), 'int', 0);
            $where['icon'] = parameterCheck($request->input('icon'), 'string', '');
            $where['is_menu'] = parameterCheck($request->input('is_menu'), 'int', 0);
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);
            $where['path'] = parameterCheck($request->input('path'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);

            $data = AdminPermissionService::save($where);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

    public function delete(Request $request)
    {

        Db::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($request->input('id'), 'int', 0);
            $data = AdminPermissionService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
