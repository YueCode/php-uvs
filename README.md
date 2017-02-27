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

执行 `php artisan vendor:publish `,将自动在 `config/` 目录下生成   `uvs.php` 文件，修改配置文件中的对应选项。

配置完成后，在需要使用的文件中使用
```php
use YueCode\Uvs\Uvs;
```
然后使用静态方法调用
比如

```php
dd(Uvs::listFolder('/))
```