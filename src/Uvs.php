<?php
/**
 * Created by PhpStorm.
 * User: Bestony
 * Date: 2017/2/12
 * Time: 10:19
 */

namespace YueCode\Uvs;

use YueCode\Uvs\Video;

class Uvs
{

    const PKG_VERSION = '1.0.0';


    public static function getUA()
    {
        return 'QcloudPHP/' . self::PKG_VERSION . ' (' . php_uname() . ')';
    }

    /**
     * 上传文件
     * @param  string $srcPath 本地文件路径
     * @param  string $dstPath 上传的文件路径
     * @param  string $videoCover 视频封面url
     * @param  string $bizAttr 文件属性，业务端维护
     * @param  string $title 视频标题
     * @param  string $desc 视频描述
     * @param  string $magicContext 自定义回调参数
     * @param  int $sliceSize 上传分片大小，不设置则采用默认值
     * @param  string $session 如果是断点续传, 则带上(唯一标识此文件传输过程的id, 由后台下发, 调用方透传)
     * @return [type]                [description]
     */
    public static function upload(
        $srcPath, $dstPath,
        $videoCover = null,
        $bizAttr = null,
        $title = null,
        $desc = null,
        $magicContext = null)
    {
        $bucket = config('uvs.BUCKET');
        return Video::upload($srcPath, $bucket, $dstPath, $videoCover, $bizAttr, $title, $desc, $magicContext);
    }

    /*
     * 创建目录
     * @param  string  $path 目录路径，sdk会补齐末尾的 '/'
     *
     */
    public static function createFolder($path,
                                        $bizAttr = null)
    {
        $bucket = config('uvs.BUCKET');
        return Video::createFolder($bucket, $path, $bizAttr);

    }

    /*
     * 目录列表,前缀搜索
     * @param  string  $path     目录路径 web.file.myqcloud.com/files/v1/[appid]/[bucket_name]/[DirName]/
     *                           web.file.myqcloud.com/files/v1/appid/[bucket_name]/[DirName]/[prefix] <- 如果填写prefix, 则列出含此前缀的所有文件
     * @param  int     $num      拉取的总数
     * @param  string  $pattern  eListBoth,ListDirOnly,eListFileOnly  默认both
     * @param  int     $order    默认正序(=0), 填1为反序,
     * @param  string  $offset   透传字段,用于翻页,前端不需理解,需要往前/往后翻页则透传回来
     *
     */
    public static function listFolder(
        $path, $num = 20,
        $pattern = 'eListBoth', $order = 0,
        $context = null)
    {
        $bucket = config('uvs.BUCKET');
        return Video::listFolder($bucket, $path, $num, $pattern, $order, $context);
    }

    /*
     * 前缀搜索
     * @param  string  $prefix   列出含此前缀的所有文件
     * @param  int     $num      拉取的总数
     * @param  string  $pattern  eListBoth,ListDirOnly,eListFileOnly  默认both
     * @param  int     $order    默认正序(=0), 填1为反序,
     * @param  string  $offset   透传字段,用于翻页,前端不需理解,需要往前/往后翻页则透传回来
     *
     */
    public static function prefixSearch(
        $prefix, $num = 20,
        $pattern = 'eListBoth', $order = 0,
        $context = null)
    {
        $bucket = config('uvs.BUCKET');
        return Video::prefixSearch($bucket, $prefix, $num, $pattern, $order, $context);
    }

    /*
     * 更新目录信息 updateFolder
     * @param  string  $path 路径， sdk会补齐末尾的 '/'
     *
     */
    public static function updateFolder($path,
                                        $bizAttr)
    {
        $bucket = config('uvs.BUCKET');
        return Video::updateFolder($bucket, $path, $bizAttr);
    }

    /*
     * 更新文件信息 update
     * @param  string  $path       路径
     * @param  string  $videoCover 视频封面url
     *
     */
    public static function update($path, $videoCover = null,
                                  $bizAttr = null, $title = null, $desc = null)
    {
        $bucket = config('uvs.BUCKET');
        return Video::update($bucket, $path, $videoCover, $bizAttr, $title, $desc);
    }

    /*
     * 目录信息 查询
     * @param  string  $path 路径，sdk会补齐末尾的 '/'
     *
     */
    public static function statFolder(
        $path)
    {
        $bucket = config('uvs.BUCKET');
        return Video::statFolder($bucket, $path);
    }

    /*
     * 文件信息 查询
     * @param  string  $path 路径
     *
     */
    public static function stat($path)
    {
        $bucket = config('uvs.BUCKET');
        return Video::stat($bucket, $path);
    }

    /*
     * 删除目录
     * @param  string  $path 路径，sdk会补齐末尾的 '/'
     *                       注意不能删除bucket下根目录/
     *
     */
    public static function delFolder($path)
    {
        $bucket = config('uvs.BUCKET');
        return Video::delFolder($bucket, $path);
    }

    /*
     * 删除文件
     * @param  string  $path 路径
     *
     */
    public static function del($path)
    {
        $bucket = config("uvs.BUCKET");
        return Video::del($bucket, $path);
    }
}