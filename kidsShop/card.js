let crise = document.getElementById("crise")
let dicrise = document.getElementById("dicrise")
let multiple = document.getElementById("multiple").textContent

console.log(multiple)
// let currentnum = 0

// crise.addEventListener("click", () => {
//     multiple.textContent = currentnum + 1
// })

// dicrise.addEventListener("click", () => {
//     if(currentnum.value >1){
//         multiple.textContent = currentnum - 1
//     }else{
//         multiple.textContent = 0
//     }
// })


crise.addEventListener("click", () => {
    multiple = multiple + 1
})

dicrise.addEventListener("click", () => {
    multiple = multiple - 1
})
