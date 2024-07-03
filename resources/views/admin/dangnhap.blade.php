<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Đăng Nhập</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <link rel="stylesheet" href="{{ asset('css/signin.css') }}">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('bootstrap-5.2.3/css/bootstrap.min.css') }}" rel="stylesheet">

  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    .full_container {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .login_section {
      width: 100%;
      max-width: 400px;
      padding: 40px;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    .logo_login img {
      display: block;
      margin: 0 auto 20px;
      /* Căn giữa và thêm khoảng cách dưới */
    }

    .field {
      margin-bottom: 15px;
      /* Thêm khoảng cách giữa các trường */
    }

    .main_bt {
      width: 100%;
      /* Đảm bảo nút bấm chiếm toàn bộ chiều ngang */
    }
  </style>
</head>

<body class="inner_page login">
  <form method="POST" action="{{route('xulydangnhap')}}">
    @csrf
    <div class="full_container">
      <div class="container">
        <div class="login_section">
          <div class="logo_login">
            <img width="210" src="images/logo/logo.png" alt="#" />
          </div>
          <div class="login_form">
            <form>
              <fieldset>
                <div class="field">
                  <label class="label_field">Tên Đăng Nhập</label>
                  <input type="text" name="ten_dang_nhap" placeholder="Tên Đăng Nhập" class="form-control" />
                </div>
                <div class="field">
                  <label class="label_field">Mật Khẩu</label>
                  <input type="password" name="mat_khau" placeholder="Mật Khẩu" class="form-control" />
                </div>
                <div class="field">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> Nhớ Mật Khẩu
                  </label>
                  <a class="forgot" href="">Quên Mật Khẩu?</a>
                </div>
                <div class="field margin_0">
                  <button class="main_bt btn btn-primary">Đăng Nhập</button>
                </div>
              </fieldset>
            </form>
            @if ($errors->any())
            <div>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

  <script>
    $(document).ready(function() {
      $('#show-password').change(function() {
        if ($(this).is(':checked')) {
          $('#password').attr('type', 'text');
        } else {
          $('#password').attr('type', 'password');
        }
      });

      $('#form-login input').on('input', function() {
        if ($(this).hasClass('is-invalid')) {
          $(this).removeClass('is-invalid');
          var errorClassName = $(this).attr('name') + '-error';
          $('.' + errorClassName).text('');
        }
      });
    });
  </script>
</body>

</html>