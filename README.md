# Sample App

Generative AI研究用のサンプルアプリ（バックエンド）  
(Written by ChatGPT-4)

## ディレクトリ構成

- `app`: アプリケーションの主要なビジネスロジックが含まれています。ここには、モデル、コントローラー、ミドルウェアなどのクラスが含まれます。
    - `Console`: アーティザンコマンドの定義が含まれます。
    - `Exceptions`: アプリケーションの例外ハンドラが含まれます。
    - `Http`: コントローラー、ミドルウェア、リクエスト、レスポンスなどが含まれます。
    - `Models`: Eloquentモデルの定義が含まれます。
    - `Providers`: サービスプロバイダが含まれます。

- `config`: アプリケーションの設定ファイルが含まれます。

- `database`: データベースのマイグレーション、データベースのシーダー、そしてモデルファクトリが含まれます。

- `routes`: 全てのルート定義が含まれます。

- `storage`: コンパイルされたBladeテンプレート、ファイルベースのセッション、ファイルキャッシュ、そしてその他のファイルベースのデータが含まれます。

- `tests`: 自動テストが含まれます。

- `vendor`: Composer 依存関係が含まれます。

## 環境構築

1. リポジトリをクローンします:

```bash
git clone https://github.com/username/my-laravel-project.git
```

2. ディレクトリに移動します:

```bash
cd my-laravel-project
```

3. Composerを使って依存関係をインストールします:

```bash
composer install
```

6. `.env` ファイルを編集して、データベース接続を設定します。
   - ホストマシン（Dockerコンテナ以外）でサーバ起動、DBのマイグレートをする場合以下の設定を編集する必要があります
     - DB_HOST=127.0.0.1 
     - DB_PORT=3309

7. データベースをマイグレートします:
```bash
php artisan migrate
```

8. 必要に応じて、初期データをシードします:
```bash
php artisan db:seed
```

## データベースマイグレーションの使い方

データベースマイグレーションは、データベースの状態をバージョン管理するための仕組みです。マイグレーションを使ってテーブルを作成したり、テーブルに変更を加えたりします。

新しいマイグレーションを作成するには:

```bash
php artisan make:migration create_users_table
```

すべてのマイグレーションを実行するには:

```bash
php artisan migrate
```

マイグレーションをロールバックするには:

```bash
php artisan migrate:rollback
```

特定のステップだけマイグレーションをロールバックするには:

```bash
php artisan migrate:rollback --step=1
```

## サーバの起動方法

ビルトインの開発サーバを起動するには、以下のコマンドを実行します:

```bash
php artisan serve
```

これで、http://localhost:8000 でアプリケーションにアクセスできます。

## APIの実装手順

Laravelではコントローラを利用してAPIを簡単に作成することができます。以下に、新しいAPIエンドポイントを作成し、データベースからデータを取得してレスポンスを返す手順を示します。

1. まず、Artisan CLIツールを使用して新しいコントローラを作成します。以下のコマンドは `UserController` という名前の新しいコントローラを `app/Http/Controllers` ディレクトリに作成します。

```bash
php artisan make:controller UserController
```

2. 作成したコントローラの中にメソッドを追加します。例えば、`index` という名前のメソッドを追加すると以下のようになります。ここでは、ユーザーモデルから全てのユーザーデータを取得し、それをレスポンスとして返しています。

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }
}
```

3. 次に、APIのルーティングを設定します。`routes/api.php` を開き、以下のように新しいルートを追加します。

```php
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index']);
```

これで、HTTP GETリクエストが '/api/users' に送られると、`UserController` の `index` メソッドが呼び出されます。

4. 最後に、APIをテストします。以下のように `curl` コマンドを使用してAPIを呼び出すことができます。

```bash
curl http://localhost:8000/api/users
```

以上が、LaravelでのAPIの基本的な実装手順です。APIの設計と実装には多くの考慮事項がありますので、必要に応じて適切なミドルウェアの使用、エラーハンドリング、認証や認可の機構などを考慮に入れてください。

## その他

詳細な情報や使用方法については、[Laravel 公式ドキュメンテーション](https://laravel.com/docs)をご覧ください。

