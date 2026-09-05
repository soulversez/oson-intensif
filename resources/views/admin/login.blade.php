<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      -webkit-font-smoothing: antialiased;
    }

    body {
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: linear-gradient(180deg, #aadaff 0%, #eef7ff 100%);
      padding: 20px;
    }

    .card-container {
      display: flex;
      width: 820px;
      height: 480px;
      background-color: #ffffff;
      border-radius: 35px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06);
    }

    .left-section {
      width: 48%;
      height: 100%;
      background: linear-gradient(180deg, #d3eafe 0%, #90c8fe 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    .mascot-image {
      width: 100%;
      max-width: 290px;
      height: auto;
      object-fit: contain;
    }

    .right-section {
      width: 52%;
      height: 100%;
      padding: 45px 48px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background-color: #ffffff;
    }

    .title {
      font-size: 2.6rem;
      font-weight: 800;
      line-height: 1.1;
      margin-bottom: 4px;
      letter-spacing: -0.5px;
      background: linear-gradient(180deg, #050F71 0%, #6A96CA 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .subtitle {
      font-size: 0.92rem;
      font-weight: 700;
      color: #050F71;
      margin-bottom: 32px;
      letter-spacing: -0.2px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 18px;
      width: 100%;
    }

    .input-field {
      width: 100%;
      height: 48px;
      padding: 0 24px;
      border-radius: 24px;
      border: none;
      background-color: #7cb5ec;
      color: #ffffff;
      font-size: 0.95rem;
      font-weight: 500;
      outline: none;
    }

    .input-field::placeholder {
      color: #ffffff;
      opacity: 0.95;
      font-weight: 500;
    }

    .submit-button {
      width: 100%;
      height: 48px;
      margin-top: 6px;
      border-radius: 24px;
      border: none;
      background-color: #52be68;
      color: #ffffff;
      font-size: 1rem;
      font-weight: 700;
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    .submit-button:hover {
      background-color: #47ab5c;
    }

    .error-message {
      color: #d9534f;
      font-size: 0.8rem;
      font-weight: 600;
      text-align: center;
      margin-top: -5px;
    }

    @media (max-width: 768px) {
      .card-container {
        flex-direction: column;
        width: 100%;
        height: auto;
      }

      .left-section,
      .right-section {
        width: 100%;
      }

      .left-section {
        height: 260px;
      }

      .right-section {
        padding: 35px 25px;
      }
    }
  </style>
</head>

<body>

  <div class="card-container">

    <div class="left-section">
      <img
        src="{{ asset('images/Maskot Log In.png') }}"
        alt="Oson Intensif Mascot Log In"
        class="mascot-image"
      >
    </div>

    <div class="right-section">

      <h1 class="title">Masuk</h1>
      <p class="subtitle">Sebagai Admin Oson Itensif</p>

      <form
        class="form-group"
        action="{{ route('admin.login.submit') }}"
        method="POST"
        autocomplete="off"
      >
        @csrf

        <input
          type="text"
          name="name"
          placeholder="Nama"
          class="input-field"
          required
          autocomplete="off"
          autocorrect="off"
          autocapitalize="none"
          spellcheck="false"
          value="{{ old('name') }}"
        >

        <input
          type="password"
          name="password"
          placeholder="Kata Sandi"
          class="input-field"
          required
          autocomplete="new-password"
        >

        @if ($errors->any())
          <div class="error-message">
            {{ $errors->first() }}
          </div>
        @endif

        <button
          type="submit"
          class="submit-button"
        >
          Masuk
        </button>

      </form>

    </div>

  </div>

</body>
</html>
