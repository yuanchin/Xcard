# [X*CARD*](http://xcard.test/)

> 🚨此項目僅為練習項目而已！可以供參考學習

## 運行環境要求

- Windows 7及以上
- PHP 7.1+
- MySQL 5.7.7+


## 開發環境佈署／安裝

本項目代碼使用 php 框架 laravel 8.* 開發，開發環境為 Laravel Homestead。
    
下文將假設已經是在 Homestead 環境建立好的情況下說明。如還未安裝請參考 [Homestead 安裝與設置](https://laravel.com/docs/8.x/homestead) 進行配置與安裝

### 基礎安裝

#### 克隆源代碼到本地：

    > git clone git@github.com:YuanChin/Xcard.git

#### 配置本地的Homestead：

1).在 Windows 下開啟 Hosts 文件
    
    文件路徑：C:\Windows\System32\Drivers\etc\hosts

2).在此文件下最後一列新增：
    
    192.168.10.10   xcard.test

3).打開 Homestead.yaml 進行以下編輯：

```
folders:
    - map: ~\your~path\code # 你本地的項目目錄地址
      to: /home/vagrant/code
      type: "nfs"

sites:
    - map: xcard.test
      to: /home/vagrant/code/xcard/public
    
databases:
    - xcard
    
features:
    - elasticsearch:
        version: 7.9.0
    - mysql: true
    - mariadb: false
    - ohmyzsh: false
    - webdriver: false
```

4).修改完成後保存，然後執行以下命令：

```shell
cd ~/Homestead && vagrant provision && vagrant reload
```
- `vagrant provision`為重新加載`Homestead.yaml`的配置
- `vagrant reload`為重新啟動`vagrant`

5).安裝依賴套件

```shell
composer install
```

6).進行 env 環境設置

```
APP_NAME=Xcard
APP_ENV=local
APP_KEY=your_app_key
APP_DEBUG=true
APP_URL=http://xcard.test

DB_DATABASE=xcard
DB_USERNAME=homestead
DB_PASSWORD=secret
```

7).讓開發環境代碼風格一致，編輯`.editorconfig`文件：

```
root = true

[*]
charset = utf-8
end_of_line = lf
insert_final_newline = true
indent_style = space
indent_size = 4
trim_trailing_whitespace = true

[*.md]
trim_trailing_whitespace = false

[*.{yml,yaml}]
indent_size = 2

[*.{js,html,blade.php,css,scss,vue}]
indent_style = space
indent_size = 2
```

8).編輯`config/app.php`：

```
'timezone' => 'Asia/Taipei',
'locale' => 'zh-TW',
```




## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
