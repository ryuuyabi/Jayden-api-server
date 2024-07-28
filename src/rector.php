<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    // rectorを動作させたいパスを指定する
    $rectorConfig->paths([
        __DIR__ . '/app',
    ]);

    // rector内で動作させたい設定を呼ぶ
    $rectorConfig->removeUnusedImports();

    $rectorConfig->rules([
        // こちらに追加したいルールを記載する
        // 例
        Rector\Arguments\Rector\MethodCall\RemoveMethodCallParamRector::class,
        // @see https://github.com/rectorphp/rector-phpunit/blob/main/docs/rector_rules_overview.md
        // @see https://github.com/rectorphp/rector/blob/main/docs/rector_rules_overview.md
    ]);

    $rectorConfig->skip([
        // SKIPしたいルールをこちらに記載する
    ]);

    $rectorConfig->sets([
        // ルールセットを記載する
    ]);
};
