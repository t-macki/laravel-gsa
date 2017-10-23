laravel-gsa
================

Google Sheets APIをLaravelから利用するためのライブラリです。

- [Google Sheets API](https://developers.google.com/sheets/api/) 


## 要件
- Laravel5.5以上


## インストール
インストールするには、Composerを使うことをお勧めします。
```bash
curl -sS https://getcomposer.org/installer | php
```

Composerコマンドを実行して、安定版のlaravel-gsaをインストールします。
```bash
composer.phar require macki/laravel-gsa
```


## 構成
アプリケーション用の設定ファイルを追加します。

config/google-sheet-api.php

```bash
php artisan vendor：publish
```

.env

```bash
GOOGLE_SHEET_APPLICATION_NAME=
GOOGLE_SHEET_SECRET_PATH=
GOOGLE_SHEET_ACCESS_TYPE=
```

## 使い方

利用する前にcredentialsファイルを用意しておいてください。  


```php
<?php
use GoogleSheetsApiClient;

$service = GoogleSheetsApiClient::getService();

$response = $service->spreadsheets_values->get($sheetId, 'シート1!A1:D5');
foreach ($response->getValues() as $index => $cols) {
echo sprintf('#%d >> "%s"', $index + 1, implode('", "', $cols)) . PHP_EOL;


```


## ライセンス
MIT
