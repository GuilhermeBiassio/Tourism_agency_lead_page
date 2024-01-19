        const inputFile = document.querySelector("#dropzone-file");
        const pictureImage = document.querySelector("#show-image");
        const qrcodeBtn = document.querySelector("#qrcode_btn");
        const qrcodeDiv = document.querySelector("#qrcode");
        const dropLabel = document.querySelector("#drop_label");
        const deleteBtns = document.querySelectorAll(".delete-btn");

        deleteBtns.forEach(function(deleteBtn) {
        deleteBtn.addEventListener("click", function(e){
            if(confirm("Deseja remover esse item?")){
                this.form.submit();
            }
        })
    });

        function qrcodeGenerator(qrcode,x,y){            
                qrcodeDiv.innerHTML = "";
                new QRCode(qrcodeDiv, {
                    text: qrcode,
                    width: x,
                    height: y,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                });
            
        }

        inputFile.addEventListener("change", function(e) {
            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener("load", function(e) {
                    const readerTarget = e.target;

                    const img = document.createElement("img");
                    img.src = readerTarget.result;
                    img.classList.add("max-w-full", "max-h-full", "rounded");
                    console.log(img);

                    pictureImage.innerHTML = "";
                    pictureImage.appendChild(img);
                });

                reader.readAsDataURL(file);
            } else {
                pictureImage.innerHTML = "<p class=\"font-bold\">Nenhuma imagem adicionada!</p>";
            }
        });

        qrcodeBtn.addEventListener("click", function(e) {
            var qrcodeValue = document.querySelector("#qrcode_input").value;
            if (qrcodeValue != "") {
                try {
                    let url = new URL(qrcodeValue);
                    console.log(url);
                    qrcodeGenerator(qrcodeValue,160,160);
                    qrcodeDiv.style.display = "block";
                } catch (err) {
                    alert("O link digitado não é válido!");
                }
            } else {
                alert("Digite um link para visualizar o QR Code");
            }

        });