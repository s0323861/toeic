<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>TOEIC受験日程メーカー</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm mb-4">
        <div class="card-body text-center">
            <h1 class="mb-3">
                <i class="fa-solid fa-graduation-cap text-primary"></i>
                TOEIC受験日程メーカー
            </h1>

            <p class="text-muted">
                TOEICの日程をGoogleカレンダーへ一発追加できます。
            </p>
        </div>
    </div>

    <form action="generate.php" method="post">

        <!-- 試験種別 -->
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                <i class="fa-solid fa-list"></i>
                試験種別
            </div>

            <div class="card-body">

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           checked
                           disabled>

                    <label class="form-check-label">
                        TOEIC Listening & Reading
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           disabled>

                    <label class="form-check-label text-muted">
                        TOEIC Speaking & Writing（準備中）
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           disabled>

                    <label class="form-check-label text-muted">
                        TOEIC Bridge（準備中）
                    </label>
                </div>

            </div>
        </div>

        <!-- 登録項目 -->
        <div class="card shadow-sm mb-4">

            <div class="card-header">
                <i class="fa-solid fa-calendar-days"></i>
                登録するイベント
            </div>

            <div class="card-body">

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="types[]"
                           value="exam"
                           checked>

                    <label class="form-check-label">
                        試験日
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="types[]"
                           value="start"
                           checked>

                    <label class="form-check-label">
                        申込開始日
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="types[]"
                           value="end"
                           checked>

                    <label class="form-check-label">
                        申込締切日
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="types[]"
                           value="score"
                           checked>

                    <label class="form-check-label">
                        デジタル公式認定証発行日
                    </label>
                </div>

            </div>
        </div>

        <!-- 試験日選択 -->
        <div class="card shadow-sm mb-4">

            <div class="card-header">
                <i class="fa-solid fa-pencil"></i>
                受験回を選択してください
            </div>

            <div class="card-body">

                <?php

                $tests = [
                    "20260712" => "2026年7月12日(日)",
                    "20260823" => "2026年8月23日(日)",
                    "20260905" => "2026年9月5日(土)",
                    "20260927" => "2026年9月27日(日)",
                    "20261025" => "2026年10月25日(日)",
                    "20261115" => "2026年11月15日(日)",
                    "20261206" => "2026年12月6日(日)",
                    "20261219" => "2026年12月19日(土)"
                ];

                foreach ($tests as $key => $value) {
                    echo "
                    <div class='form-check mb-2'>
                        <input class='form-check-input'
                               type='checkbox'
                               name='tests[]'
                               value='{$key}'>

                        <label class='form-check-label'>
                            {$value} TOEIC L&R 公開テスト
                        </label>
                    </div>";
                }

                ?>

            </div>
        </div>

        <div class="text-center">
            <button class="btn btn-primary btn-lg">
                <i class="fa-brands fa-google"></i>
                Googleカレンダーへ追加
            </button>
        </div>

    </form>

</div>

</body>
</html>