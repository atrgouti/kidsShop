const main = document.querySelector(".main")
const boxs = document.querySelectorAll(".box")
const offers = document.querySelectorAll(".offer")
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        entry.target.classList.toggle("active", entry.isIntersecting)
    })
})


const observer2 = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        entry.target.classList.toggle("show", entry.isIntersecting)
    })
})

boxs.forEach(box => {
    observer.observe(box)
})


offers.forEach(offer => {
    observer2.observe(offer)
})