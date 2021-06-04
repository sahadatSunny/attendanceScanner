<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    
    <title>Document</title>
</head>
<body>
        <div id="text">
        
            <h1>hello</h1>
            <h1>hello</h1>
            <h1>hello</h1>
        
        </div>

    <button onclick="generatePDF()">save</button>




    <script>

function generatePDF(){

const idCard = document.getElementById("text");
html2pdf()
.from(idCard)
.save();
}
    </script>


</body>
</html>