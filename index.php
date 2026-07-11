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

                <div class="form-check mb-2">
                    <input class="form-check-input exam-type"
                        type="checkbox"
                        id="type-lr"
                        data-target="lr-area"
                        checked>

                    <label class="form-check-label" for="type-lr">
                        <i class="fa-solid fa-headphones text-primary"></i>
                        TOEIC Listening & Reading
                    </label>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input exam-type"
                        type="checkbox"
                        id="type-sw"
                        data-target="sw-area">

                    <label class="form-check-label" for="type-sw">
                        <i class="fa-solid fa-microphone text-success"></i>
                        TOEIC Speaking & Writing
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input exam-type"
                        type="checkbox"
                        id="type-bridge"
                        data-target="bridge-area">

                    <label class="form-check-label" for="type-bridge">
                        <i class="fa-solid fa-bridge text-warning"></i>
                        TOEIC Bridge
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

                <div id="lr-area">

                    <h5 class="mt-3 mb-3">
                        <i class="fa-solid fa-headphones text-primary"></i>
                        TOEIC Listening & Reading
                    </h5>

                    <?php
                    $lr_tests = [
                        "lr_20260712" => "2026年7月12日(日)",
                        "lr_20260823" => "2026年8月23日(日)",
                        "lr_20260905" => "2026年9月5日(土)",
                        "lr_20260927" => "2026年9月27日(日)",
                        "lr_20261025" => "2026年10月25日(日)",
                        "lr_20261115" => "2026年11月15日(日)",
                        "lr_20261206" => "2026年12月6日(日)",
                        "lr_20261219" => "2026年12月19日(土)"
                    ];

                    foreach ($lr_tests as $key => $value) {
                        echo "
                        <div class='form-check mb-2'>
                            <input class='form-check-input'
                                type='checkbox'
                                name='tests[]'
                                value='{$key}'>
                            <label class='form-check-label'>
                                {$value} TOEIC L&R
                            </label>
                        </div>";
                    }
                    ?>
                </div>

                <div id="sw-area" style="display:none;">

                    <h5 class="mt-4 mb-3">
                        <i class="fa-solid fa-microphone text-success"></i>
                        TOEIC Speaking & Writing
                    </h5>

                    <?php
                    $sw_tests = [
                        "sw_20260809" => "2026年8月9日(日)",
                        "sw_20260913" => "2026年9月13日(日)",
                        "sw_20261018" => "2026年10月18日(日)",
                        "sw_20261129" => "2026年11月29日(日)",
                        "sw_20261220" => "2026年12月20日(日)",
                        "sw_20270131" => "2027年1月31日(日)",
                        "sw_20270228" => "2027年2月28日(日)",
                        "sw_20270328" => "2027年3月28日(日)"
                    ];

                    foreach ($sw_tests as $key => $value) {
                        echo "
                        <div class='form-check mb-2'>
                            <input class='form-check-input'
                                type='checkbox'
                                name='tests[]'
                                value='{$key}'>
                            <label class='form-check-label'>
                                {$value} TOEIC S&W
                            </label>
                        </div>";
                    }
                    ?>
                </div>

                <div id="bridge-area" style="display:none;">

                    <h5 class="mt-4 mb-3">
                        <i class="fa-solid fa-bridge text-warning"></i>
                        TOEIC Bridge
                    </h5>

                    <?php
                    $bridge_tests = [
                        "bridge_106" => "第106回 TOEIC Bridge",
                        "bridge_107" => "第107回 TOEIC Bridge",
                        "bridge_108" => "第108回 TOEIC Bridge",
                        "bridge_109" => "第109回 TOEIC Bridge"
                    ];

                    foreach ($bridge_tests as $key => $value) {
                        echo "
                        <div class='form-check mb-2'>
                            <input class='form-check-input'
                                type='checkbox'
                                name='tests[]'
                                value='{$key}'>
                            <label class='form-check-label'>
                                {$value}
                            </label>
                        </div>";
                    }
                    ?>
                </div>

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