# UnivaPay-for-EC4-Legacy

[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)  
UnivaPay旧ペイメントゲートウェイプラグイン  
新規案内は終了しています。新ゲートウェイ用のものは下記を参照ください。  
<https://github.com/univapay/UnivaPay-for-EC-CUBE4>  
最新のリリースは下記から  
<https://github.com/univapay/UnivaPay-for-EC4-Legacy/releases>

## 開発環境

[プラグインの実装に関するドキュメント](UpcPaymentPlugin/README.md)

### 管理者向け

```sh
git clone https://github.com/univapaycast/UnivaPay-for-EC4-Legacy.git
cd UnivaPay-for-EC4-Legacy
docker compose up -d
docker compose exec web sh -c "bin/console eccube:plugin:install --code=UpcPaymentPlugin && bin/console eccube:plugin:enable --code=UpcPaymentPlugin"
```

#### データベース更新したとき

```sh
docker compose exec web sh -c "bin/console eccube:install -n && bin/console eccube:plugin:install --code=UpcPaymentPlugin && bin/console eccube:plugin:enable --code=UpcPaymentPlugin"
```

#### アップデート手順

1. composer.json内のversionを上げる
2. masterにコミット後github内でバージョンタグの作成


#### 決済フォームの設定

ECサイト側に決済フォームを表示するため、以下の手順で管理画面にコードを追加してください。

1. **商品購入ページへのタグ追加**  
    ECCUBE管理画面で以下の手順を実行します：  
    - **コンテンツ管理 > ページ管理 > 商品購入** を開きます。
    - テンプレート内の以下の部分を検索します：  
      ```html
      <div class="ec-orderRole__detail">
      ```
    - 上記の直後に以下のタグを追加します：  
      ```twig
      {{ include('@UpcPaymentPlugin/credit.twig', ignore_missing=true) }}
      ```

2. **ご注文確認ページへのタグ追加**  
    ECCUBE管理画面で以下の手順を実行します：  
    - **コンテンツ管理 > ページ管理 > 商品購入/ご注文確認** を開きます。
    - テンプレート内の以下の部分を検索します（デフォルトで81行目）：  
      ```html
      <div class="ec-orderDelivery">
      ```
    - 上記の直前に以下のタグを追加します：  
      ```twig
      {{ include('@UpcPaymentPlugin/credit_confirm.twig', ignore_missing=true) }}
      ```
