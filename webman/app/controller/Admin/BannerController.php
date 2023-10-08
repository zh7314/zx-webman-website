<?php

namespace app\controller\Admin;

use support\Request;
use app\service\Admin\BannerService;
use Throwable;
use app\util\ResponseTrait;
use support\Db;


class BannerController
{

    use ResponseTrait;

    public function getList(Request $request)
    {
        try {
            $where = [];
            $page = parameterCheck($request->input('page'), 'int', 0);
            $pageSize = parameterCheck($request->input('pageSize'), 'int', 0);

            $where['admin_id'] = parameterCheck($request->input('admin_id'), 'float', 0);
            $where['end_time'] = parameterCheck($request->input('end_time'), 'string', '');
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['pic_path'] = parameterCheck($request->input('pic_path'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($request->input('start_time'), 'string', '');
            $where['url'] = parameterCheck($request->input('url'), 'string', '');
            $where['video_path'] = parameterCheck($request->input('video_path'), 'string', '');
            $where['banner_cate_id'] = parameterCheck($request->input('banner_cate_id'), 'float', 0);

            $data = BannerService::getList($where, $page, $pageSize);

            return $this->success($data);
        } catch (Throwable $e) {
            return $this->fail($e);
        }
    }

    public function getAll(Request $request)
    {
        try {
            $where = [];

            $where['admin_id'] = parameterCheck($request->input('admin_id'), 'float', 0);
            $where['end_time'] = parameterCheck($request->input('end_time'), 'string', '');
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['pic_path'] = parameterCheck($request->input('pic_path'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($request->input('start_time'), 'string', '');
            $where['url'] = parameterCheck($request->input('url'), 'string', '');
            $where['video_path'] = parameterCheck($request->input('video_path'), 'string', '');

            $data = BannerService::getAll($where);

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

            $data = BannerService::getOne($where['id']);

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
            $where['admin_id'] = parameterCheck($request->input('admin_id'), 'float', 0);
            $where['end_time'] = parameterCheck($request->input('end_time'), 'string', '');
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['pic_path'] = parameterCheck($request->input('pic_path'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($request->input('start_time'), 'string', '');
            $where['url'] = parameterCheck($request->input('url'), 'string', '');
            $where['video_path'] = parameterCheck($request->input('video_path'), 'string', '');
            $where['banner_cate_id'] = parameterCheck($request->input('banner_cate_id'), 'float', 0);

            $data = BannerService::add($where);

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
            $where['admin_id'] = parameterCheck($request->input('admin_id'), 'float', 0);
            $where['end_time'] = parameterCheck($request->input('end_time'), 'string', '');
            $where['lang'] = parameterCheck($request->input('lang'), 'string', '');
            $where['name'] = parameterCheck($request->input('name'), 'string', '');
            $where['pic_path'] = parameterCheck($request->input('pic_path'), 'string', '');
            $where['platform'] = parameterCheck($request->input('platform'), 'string', '');
            $where['sort'] = parameterCheck($request->input('sort'), 'int', 0);
            $where['start_time'] = parameterCheck($request->input('start_time'), 'string', '');
            $where['url'] = parameterCheck($request->input('url'), 'string', '');
            $where['video_path'] = parameterCheck($request->input('video_path'), 'string', '');
            $where['banner_cate_id'] = parameterCheck($request->input('banner_cate_id'), 'float', 0);

            $data = BannerService::save($where);

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
            $data = BannerService::delete($where['id']);

            Db::commit();
            return $this->success($data);
        } catch (Throwable $e) {
            Db::rollBack();
            return $this->fail($e);
        }
    }

}
