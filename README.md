# TOEIC Calendar Generator

![PHP](https://img.shields.io/badge/PHP-8.x-blue)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple)
![License](https://img.shields.io/badge/License-MIT-green)

TOEIC Listening & Reading、Speaking & Writing、Bridge の公開テスト日程を
Google カレンダーへ簡単に追加できる Web アプリです。

受験予定の回を選択するだけで、Google カレンダーに登録可能な `.ics` ファイルを自動生成します。

---

## 🌐 Demo

https://tsukuba42195.sakura.ne.jp/toeic/

---

## 📷 Screenshot

![Demo](demo.png)

---

## ✨ Features

* TOEIC Listening & Reading 公開テストに対応
* TOEIC Speaking & Writing 公開テストに対応
* TOEIC Bridge 公開テストに対応
* 試験種別ごとの絞り込み表示
* Google カレンダー登録用の ICS ファイルを自動生成
* 試験日だけでなく申込開始日・申込締切日・スコア発表日も登録可能
* スマートフォン対応
* シンプルで分かりやすい UI
* PHP のみで動作し、データベース不要

---

## 🚀 How to Use

1. 試験種別を選択します。
2. 「受験回を選択してください」から希望する回を選択します。
3. 「Googleカレンダーへ追加」をクリックします。
4. ダウンロードされた `.ics` ファイルを開きます。
5. Google カレンダーへ予定を追加します。

---

## 📅 Registered Events

生成される ICS ファイルには、以下の予定が登録されます。

### TOEIC Listening & Reading

* 申込開始日
* 申込締切日
* 試験日
* デジタル公式認定証発行日

### TOEIC Speaking & Writing

* 申込開始日
* 申込締切日
* 試験日
* スコア発表日

### TOEIC Bridge

* 申込開始日
* 申込締切日
* 試験日
* スコア発表日

---

## 🛠 Built With

* PHP
* Bootstrap 5
* Font Awesome
* iCalendar (.ics)

---

## 📂 Project Structure

| File                | Description  |
| ------------------- | ------------ |
| `index.php`         | メイン画面        |
| `generate.php`      | ICS ファイル生成処理 |
| `schedule_data.php` | TOEIC 日程データ  |
| `demo.png`          | デモ画像         |
| `README.md`         | プロジェクト説明     |

---

## 🔧 Technical Features

* `UID` を付与した RFC5545 準拠の ICS ファイルを生成
* `DTSTAMP` に対応
* データと表示ロジックを分離した構成
* 新しい試験日程は `schedule_data.php` のみ更新すれば対応可能
* 新しい試験種別の追加が容易

---

## 🚧 Planned Features

* 実用英語技能検定（英検）対応版
* 漢字検定対応版
* 大学入試日程対応版
* 模試日程対応版
* 試験種別ごとの登録項目のカスタマイズ機能

---

## 📄 License

MIT License

---

## 👨‍💻 Author

**向井 聡 (Akira Mukai)**

Blog
https://s0323861.github.io/

GitHub
https://github.com/s0323861

---

## ⚠ Disclaimer

This project is not affiliated with or endorsed by ETS or IIBC.

TOEIC is a registered trademark of Educational Testing Service (ETS).
