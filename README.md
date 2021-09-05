<h1 align="center"><a href="#" target="_blank"><strong>XCARD</a></h1>
    <p>一個類似於Dcard的項目</p>

> 🚨此項目僅為練習項目而已！可以供參考學習

## 運行環境要求

- Windows 7及以上
- PHP 7.1+
- MySQL 5.7.7+


## 開發環境佈署／安裝

本項目代碼使用 php 框架 laravel 8.* 開發，開發環境為 Laravel Homestead。
下文將假設已經是在 Homestead 環境建立好的情況下說明。如還未安裝請參考 [Homestead 安裝與設置](https://laravel.com/docs/8.x/homestead) 進行配置與安裝

### 基礎安裝

克隆源代碼到本地：

    > git clone git@github.com:YuanChin/Xcard.git

配置本地的Homestead：

1).在 Windows 下開啟 Hosts 文件
    
    文件路徑：C:\Windows\System32\Drivers\etc\hosts

2).在此文件下最後一列新增：
    
    192.168.10.10   xcard.test

3).打開 Homestead.yaml 進行以下編輯：
    
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

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
