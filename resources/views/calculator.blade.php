<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <form action="/calculate" method="POST">
        @csrf
        <div>
            <label for="number1">Bilangan 1:</label>
            <input type="number" name=="number1" id="number1" value="{{ $number1 ?? '' }}" required>
        </div>
        <div>
            <label for="number2">Bilangan 2:</label>
            <input type="number" name="number2" id="number2" value="{{ $number2 ?? '' }}" required>
        </div>
        <div>
            <label>Pilih operasi:</label><br>
            <input type="radio" name="operation" value="tambah" {{ (isset($operation) && $operation == 'tambah') ? 'checked' : '' }}> Tambah<br>
            <input type="radio" name="operation" value="kurang" {{ (isset($operation) && $operation == 'kurang') ? 'checked' : '' }}> Kurang<br>
            <input type="radio" name="operation" value="kali" {{ (isset($operation) && $operation == 'kali') ? 'checked' : '' }}> Kali
        </div>
        <div>
            <button type="submit">Hitung</button>
        </div>
    </form>

    @if(isset($result))
        <p>Hasil: {{ $result }}</p>
    @endif
</body>
</html>
