<?php

namespace app\controller\Admin;

use app\service\Admin\CommonService;
use support\Request;
use app\service\Admin\DownloadCateService;
use Throwable;
use app\util\ResponseTrait;
use Illuminate\Support\Facades\DB;


class DownloadCateController 
{

    use ResponseTrait;

    public function getList(Request $request)
    {
        try {
            $where = [];
            $page = parameterCheck($request->page, 'int', 0);
            $pageSize = parameterCheck($request->pageSize, 'int', 0);

            $where['is_show'] = parameterCheck($request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);

            $data = DownloadCateService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $where = [];

            $where['is_show'] = parameterCheck($request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);


            $data = DownloadCateService::getAll($where);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getOne(Request $request)
    {
        try {
            $where = [];

            $where['id'] = parameterCheck($request->id, 'int', 0);

            $data = DownloadCateService::getOne($where['id']);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function add(Request $request)
    {

        DB::beginTransaction();
        try {
            $where = [];
            $where['is_show'] = parameterCheck($request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);

            $data = DownloadCateService::add($where);

            DB::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }

    public function save(Request $request)
    {

        DB::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($request->id, 'int', 0);
            $where['is_show'] = parameterCheck($request->input('is_show'), 'int', 0);
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['parent_id'] = parameterCheck($request->input('parent_id'), 'float', 0);
            $where['pic'] = parameterCheck($request->input('pic'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);

            $data = DownloadCateService::save($where);

            DB::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }

    public function delete(Request $request)
    {

        DB::beginTransaction();
        try {
            $where = [];
            $where['id'] = parameterCheck($request->id, 'int', 0);
            $data = DownloadCateService::delete($where['id']);

            DB::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->fail($e);
        }
    }


}
