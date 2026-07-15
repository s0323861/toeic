# Changelog

このファイルでは、このプロジェクトの主な変更履歴を管理します。

## [1.1.0] - 2026-07-15

### Added

* `schedule_data.php` を追加
* TOEIC 日程データと表示ロジックを分離
* 動的な試験種別表示に対応
* GitHub Topics を追加
* About セクションを追加

### Changed

* README を全面的に改善
* `generate.php` のデータ形式を変更
* `index.php` をリファクタリング

---

## [1.0.0] - 2026-07-11

### Added

* TOEIC Listening & Reading 対応
* TOEIC Speaking & Writing 対応
* TOEIC Bridge 対応
* ICS ファイル生成機能
* Google カレンダー連携
* スマートフォン対応 UI
* Demo ページ公開

### Technical

* PHP + Bootstrap 5 による実装
* RFC5545 準拠の ICS ファイル生成
* UID および DTSTAMP に対応
