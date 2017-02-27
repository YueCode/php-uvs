# UVS (微视频) 拓展 For Laravel 
腾讯云微视频支持


### 安装

执行 `composer` 命令安装拓展
```
composoer require yuecode/uvs
```

在`config/app.php`中的 Provider 中添加
```
\YueCode\Uvs\UvsProvider::class,
```

执行 `php artisan vendor:publish `,将自动在 `config/` 目录下生成   `uvs.php` 文件，对应配置其中的文件。