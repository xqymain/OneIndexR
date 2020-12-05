<h1 align="center"><a href="https://github.com/xqymain/OneIndexR" target="_blank">OneIndexR</a></h1>

> OneindexR Edition.<br>
> |(*′口`) Original Program by [Donwa](https://github.com/donwa). 

> 本项目二次开发并默认使用[dl233](https://github.com/dl233)大佬的[模板nexmoes](https://github.com/dl233/OneIndex-theme-nexmoes),该部分的二次开发应遵循[Apache License 2.0协议](http://www.apache.org/licenses/LICENSE-2.0)

> 本项目二次开发并默认使用[小歪](https://www.ixiaowai.cn/)大佬的[小歪API](https://api.ixiaowai.cn/)，该部分的嵌入已得到作者许可，并标明[出处](https://blog.ixiaowai.cn/zyym/750.html)

> 本项目二次开发并默认使用[Mozilla](https://github.com/mozilla)的[pdf.js](https://github.com/mozilla/pdf.js/),该部分的二次开发应遵循[Apache License 2.0协议](http://www.apache.org/licenses/LICENSE-2.0)

> 本项目默认使用ace, APlayer, video.js, mux.js, xgplayer等开源组件

>> Oneindex Bottle Edition.<br>
>> (๑•̀ㅂ•́)و✧  Original Program by [Donwa](https://github.com/donwa/oneindex). 

<p align="center">
<a href="https://github.com/xqymain/OneIndexR/stargazers"><img alt="star" src="https://img.shields.io/github/stars/xqymain/OneIndexR.svg"/></a>
<a href="https://github.com/xqymain/OneIndexR/network/members"><img alt="fork" src="https://img.shields.io/github/forks/xqymain/OneIndexR.svg"/></a>
<a href="https://github.com/xqymain/OneIndexR/commits/master"><img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/xqymain/OneIndexR.svg?label=commits"></a>
<a href="https://github.com/xqymain/OneIndexR/issues"><img alt="issues" src="https://img.shields.io/github/issues/xqymain/OneIndexR.svg"/></a>
<a href="https://github.com/xqymain/"><img alt="Author" src="https://img.shields.io/badge/author-xqymain-red.svg"/></a>
<a href="https://github.com/xqymain/OneIndexR/archive/master.zip"><img alt="Download" src="https://img.shields.io/badge/download-488KB-brightgreen.svg"/></a>
</p>

> ## 停止更新
## 仅维护
DEMO: <https://p.srv.pub/>（应网安要求更换域名）

Bottle大佬的新项目在[这里](https://github.com/SomeBottle/OdIndex)，不想换可以使用本项目的后续版本。

维护工作不出意外的话不会加入新功能，仅维持现有功能的完整性（水平有限）

## 缘由  
无意间了解到了Mircosoft E5 Developer这个福利活动，出于一些原因要储存大量内容，又对数据安全和储存成本耿耿于怀（穷是原罪

几经折腾建好了[自动续费服务](https://github.com/xqymain/RenewMircosoftE5)，又由于oneindex删库，选用了[Bottle](https://github.com/SomeBottle/OneIndex)大佬的版本。
出于对CDN和视频播放的需求，现推出衍生版。

> Bottle:

> 之前听网友介绍了入了one的大门，结果鼓捣oneindex时我的历程很不顺利，一会儿文件列表出不来，一会儿jwt token又过期了...   
> 于是我修改了一下，**缓解了**部分问题.稍后可能会加入更多功能.  

## 修改内容
1. 对CDN的原生支持，在后台完善源站域名和CDN域名可以开启；
2. 对视频音频播放器的改进，**nexmoes**和**material**主题将Dplayer替换xgplayer和video.js；
3. 对js地址的修改和开源组件的更新，可能会加快某些页面的加载速度；
4. 对无效地址的移除和http地址的https化；
5. 对视频格式默认打开方式的修改，图库允许上传格式的修改，增加了flac后缀的图标和播放功能；
6. 对mp4格式播放的字幕支持；
7. 对m2ts和ts格式的自动转换（实验性）；
8. 对pdf格式在线预览的支持（精简了[pdf.js](https://github.com/xqymain/pdfjs-oidist)）；
9. 对flv格式在线播放的修复（与xgplayer对CORS的兼容度有关，具体不详）。

> Bottle:
> 1. 密码md5密文保存  
> 2. 自动判断HTTP 429请求过多的错误，并自动限制刷新的时间间隔，自动调整刷新周期.(如果没有到周期会返回提示)↓
  
  ![Cache Refresh Attention](https://ww2.sinaimg.cn/large/ed039e1fgy1g1dncyfprgj20iw0acwee)  
  
  ![Cache Refresh CLI](https://ww2.sinaimg.cn/large/ed039e1fgy1g1dnd9mrelj20dq02bt8l)  
  
>  详细配置可以自行去 `/config/refreshfix.php` 进行修改，`refreshinterval` 是刷新允许周期，`maxretrytime` 是自动调整周期前允许重试的次数.  
  
> 3. 防止request失败导致的空文件目录.(（づ￣3￣）づ拒绝首页空白)   
> 4. 增加**简单的**状态码&出错日志(在 `/lib` 目录下生成).( `requestcode.txt` & `requestlog.php`)  
> 5. 在**nexmoe主题**增加了一次性缩略图的加载限制，最多预览五十张（防止请求过多被限制）  
> 6. 增加缓存刷新结果，如果刷新失败，后台会显示**重建缓存失败**，CLI模式在 `one.php` 执行刷新时如果失败会返回**Failed**  
  ![Example](https://ww2.sinaimg.cn/large/ed039e1fgy1g15sddvme4j20bg0650sh)  
> 7. 文件缓存过期**引用时**自动刷新   

## 店长Bottle推荐（误  
`crontab` 选项推荐[可选]，非必需:
1. token自动刷新: 两小时

```
0 */2 * * * * php /www/one.php token:refresh
```

2. cache自动刷新: 30分钟

```
*/30 * * * * php /www/one.php cache:refresh
```
`设置`选项推荐:
> Tips：`base.php`文件安装之后会出现在`config`目录
- `base.php` 中 `cache_refresh_time` 推荐为 `3600`(秒)
- 缓存类型推荐为 `filecache`
- 缓存过期时间推荐为 `86400` (秒)
- 自动调整周期前允许重试的次数(`/config/refreshfix.php`中的`maxretrytime`)推荐为  `8`  
 
## Nginx 伪静态规则配置： 
```
if (!-f $request_filename){  
set $rule_0 1$rule_0;  
}  
if (!-d $request_filename){  
set $rule_0 2$rule_0;  
}  
if ($rule_0 = "21"){  
rewrite ^/(.*)$ /index.php?/$1 last;  
}  
```

## Apache 伪静态规则配置:
于项目目录创建`.htaccess`，并键入以下内容：
```
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule ^(.*) index.php?/$1 [L]
```

## Q&A
1. 周期限制不起效？！
     请注意您的 `/config` 目录下的文件是否可读，php有时候会出现 `permission denied` 问题  

2. 账号绑定出错（链接无效）：  
 <https://github.com/donwa/oneindex/issues/511>   

3. 程序安装失败错误：
 * 访问<https://apps.dev.microsoft.com/#/appList>  
 * 删除原有的oneindex应用  
 * 重试安装  
 * 其余还有跳转问题（链接无效）： <https://github.com/donwa/oneindex/issues/118>  

4. 西瓜播放器相关问题：
     无法播放mkv（mkv能容纳的编码太广，市面上没有项目能有效解码。推荐自行封装mp4+外挂字幕）

     外挂字幕：在视频同路径创建与视频同名的webvtt格式字幕（例：foo.mp4，其字幕文件保存为foo.vtt）
     * DEMO：https://p.srv.pub/longVideoDS/American.Factory/
