<!DOCTYPE html>
<html>
<head>
    <title>Scan QR</title>
</head>
<body>
    <h1>Scan QR Tamu</h1>
    <video id="preview" autoplay style="width:300px;height:300px;"></video>
    <div id="result"></div>

    <script type="module">
    import { BrowserMultiFormatReader } from 'https://cdn.jsdelivr.net/npm/@zxing/library@latest/+esm';
    const codeReader = new BrowserMultiFormatReader();
    codeReader.decodeFromVideoDevice(null, 'preview', (result, err) => {
      if(result){
        window.location.href = result.getText();
      }
    });
    </script>
</body>
</html>
