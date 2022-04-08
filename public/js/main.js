const divsection = document.querySelector('#section');
const img = document.querySelector('#section .img');
const breed = document.querySelector('#section h5');
const color = document.querySelector('#color');
const nameForDog = document.querySelector('#section h2');
const inputNameDog = document.querySelector("#nameDog");
const buttonSave = document.querySelector("#actionSave");
const refreshImage = document.querySelector("#refreshImage");
var identify_breeds = "";

const objForSaveCookie = {
    "identify_breeds": "",
    "bg": "",
    "name": "",
    "color": "",
    "font": "",
    "time": "",
};
const NAMEOBJ = "objkeyDogApi";
const VALUELOCALSTORAGE = window && window.localStorage && window.localStorage.getItem(NAMEOBJ) || [];
var atualdados = (VALUELOCALSTORAGE != "") ? JSON.parse(VALUELOCALSTORAGE) : [];

const updateImage = () => {
    fetch(`https://dog.ceo/api/breed/${identify_breeds}/images/random`).
        then((response, data) => {
            if (!response.ok) {
                setMessage("Não encontrado")
            }
            return response.json();
        }).then((response, data) => {
            img.style.backgroundImage = `url(${response.message})`;
            objForSaveCookie.bg = img.style.backgroundImage;
        });
}
function formatFont(text) {
    return String(text)
        .replace("cursive", ", cursive")
        .replace("sans-serif", ", sans-serif");
}
$(".select2").select2({
    language: "pt-BR",
    width: '100%',
    templateSelection: function (repo) {
        nameForDog.style.fontFamily = formatFont(repo.id)
        objForSaveCookie.font = nameForDog.style.fontFamily;
        return repo.text;
    }
});
$(".select2_breeds").select2({
    language: "pt-BR",
    width: '100%',
    templateSelection: function (repo) {
        objForSaveCookie.identify_breeds = repo.id;
        identify_breeds = String(repo.id).replace("-", "/");
        divsection.classList.remove("d-none")
        breed.innerHTML = String(repo.id).replace("-", " ");
        updateImage();
        return repo.text;
    }
});

$(inputNameDog).keyup(function () {
    nameForDog.innerHTML = this.value
    objForSaveCookie.name = this.value;
});
nameForDog.style.color = color.value
$(color).change(function () {
    objForSaveCookie.color = this.value;
    nameForDog.style.color = this.value
});
$(buttonSave).click(function () {
    setMessage("Gravado", "success")
    objForSaveCookie.time = Date.now();
    window.localStorage.setItem("obr", JSON.stringify(objForSaveCookie));
})
$(refreshImage).click(function () {
    setMessage("Atualização de imagem", "success")
    updateImage();
})
function init() {
    if (atualdados == []) {
        return;
    }
    if (typeof (atualdados.identify_breeds) != "undefined" && atualdados.identify_breeds != "") {
        $(".select2_breeds").val(atualdados.identify_breeds).trigger("change");
        atualdados.identify_breeds = "";
    }
    if (typeof (atualdados.font) != "undefined" && atualdados.font != "") {
        $(".select2").val(String(atualdados.font).replace(",", "").replaceAll('"', "")).trigger("change");
        atualdados.font = "";
    }
    if (typeof (atualdados.color) != "undefined" && atualdados.color != "") {
        objForSaveCookie.color = atualdados.color;
        nameForDog.style.color = atualdados.color;
        color.value = atualdados.color;
        atualdados.color = "";
    }
    if (typeof (atualdados.name) != "undefined" && atualdados.name != "") {
        nameForDog.innerHTML = atualdados.name
        objForSaveCookie.name = atualdados.name
        inputNameDog.value = atualdados.name
        atualdados.name = "";
    }
    //Utilizar a imagem do localstorage
    setTimeout(() => {
        if (typeof (atualdados.bg) != "undefined" && atualdados.bg != "") {
            img.style.backgroundImage = atualdados.bg;
            objForSaveCookie.bg = img.style.backgroundImage;
            atualdados.bg = "";
        }
    }, 1000);

}
init();