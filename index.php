<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>TOEIC受験日程メーカー - あなたのTOEIC試験日程を簡単に作成</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<?php
$schedules = require 'schedule_data.php';
?>

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

                <?php foreach ($schedules as $type => $group): ?>

                <div class="form-check mb-2">

                    <input class="form-check-input exam-type"
                        type="checkbox"
                        id="type-<?= $type ?>"
                        data-target="<?= $type ?>-area"
                        <?= $type === 'lr' ? 'checked' : '' ?>>

                    <label class="form-check-label">
                        <i class="fa-solid fa-<?= $group['icon'] ?>
                        text-<?= $group['color'] ?>"></i>

                        <?= $group['label'] ?>
                    </label>

                </div>

                <?php endforeach; ?>

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

                <?php foreach ($schedules as $type => $group): ?>

                <div id="<?= $type ?>-area"
                    <?= $type !== 'lr' ? 'style="display:none;"' : '' ?>>

                    <h5 class="mt-4 mb-3">
                        <i class="fa-solid fa-<?= $group['icon'] ?>
                        text-<?= $group['color'] ?>"></i>
                        <?= $group['label'] ?>
                    </h5>

                    <?php foreach ($group['events'] as $key => $event): ?>

                        <?php
                        $date = DateTime::createFromFormat(
                            'Ymd',
                            $event['exam'][0]
                        );

                        $week = ['日','月','火','水','木','金','土'];

                        $display =
                            $date->format('Y年n月j日')
                            . '('
                            . $week[$date->format('w')]
                            . ')';
                        ?>

                        <div class="form-check mb-2">
                            <input class="form-check-input"
                                type="checkbox"
                                name="tests[]"
                                value="<?= $key ?>">

                            <label class="form-check-label">
                                <?= $display ?>

                                <?php if ($group['suffix']): ?>
                                    <?= $group['suffix'] ?>
                                <?php endif; ?>
                            </label>
                        </div>

                    <?php endforeach; ?>

                </div>

                <?php endforeach; ?>

            </div>
        </div>

        <div class="text-center">
            <button id="submitBtn"
                class="btn btn-primary btn-lg w-100"
                disabled>
                <i class="fa-brands fa-google"></i>
                Googleカレンダーへ追加
            </button>
            <div id="message"
                class="text-muted text-center mt-2">
                受験回を1つ以上選択してください。
            </div>
        </div>

    </form>

</div>

<footer class="bg-dark text-light py-4 mt-5">
    <div class="container text-center">
        <p class="mb-1">TOEIC受験日程メーカー</p>
        <small>
            Developed By <a href="https://tsukuba42195.sakura.ne.jp/" class="text-light">Akira Mukai</a> | <a href="https://github.com/s0323861/toeic" class="text-light">GitHub</a>
        </small>
        <p>
            <a href="https://github.com/s0323861/toeic"
               class="btn btn-outline-light mt-3">
                <i class="fab fa-github"></i> GitHub
            </a>
        </p>
    </div>
</footer>

<script>
document.querySelectorAll('.exam-type').forEach(function(checkbox){

    checkbox.addEventListener('change', function(){

        const target =
            document.getElementById(
                this.dataset.target
            );

        if(this.checked){
            target.style.display = 'block';
        }else{
            target.style.display = 'none';

            target.querySelectorAll(
                'input[type="checkbox"]'
            ).forEach(function(cb){
                cb.checked = false;
            });
        }

    });

});

function updateSubmitButton() {

    const checkedTests =
        document.querySelectorAll(
            'input[name="tests[]"]:checked'
        );

    const submitBtn =
        document.getElementById(
            'submitBtn'
        );

    const message =
        document.getElementById(
            'message'
        );

    if (checkedTests.length > 0) {
        submitBtn.disabled = false;
        message.style.display = 'none';
    } else {
        submitBtn.disabled = true;
        message.style.display = 'block';
    }
}

document.querySelectorAll(
    'input[name="tests[]"]'
).forEach(function(cb) {

    cb.addEventListener(
        'change',
        updateSubmitButton
    );

});

updateSubmitButton();

</script>
</body>
</html>
