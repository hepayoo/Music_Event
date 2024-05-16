

const scrollRevealOption={
    distance:"50px",
    origin:"bottom",
    duration:1000
}

ScrollReveal().reveal('.header-services',{
    ...scrollRevealOption,
    origin:"top",
    delay:500
})

ScrollReveal().reveal('.header-title',{
    ...scrollRevealOption,
    origin:"left",

    delay:50
})

ScrollReveal().reveal('.header-trailer',{
    ...scrollRevealOption,
    origin:"bottom",
    delay:500
})
ScrollReveal().reveal('.header-description',{
    ...scrollRevealOption,
    origin:"bottom",
    delay:1500
})


ScrollReveal().reveal('.item-l',{
    ...scrollRevealOption,
    origin:"left",
    delay:750
})
ScrollReveal().reveal('.item-r',{
    ...scrollRevealOption,
    origin:"right",
    delay:750
})

ScrollReveal().reveal('.item-t',{
    ...scrollRevealOption,
    origin:"top",
    delay:750
})
ScrollReveal().reveal('.item-b',{
    ...scrollRevealOption,
    origin:"bootom",
    delay:750
})

ScrollReveal().reveal('.heading .title',{
    ...scrollRevealOption,
    origin:"top",
    delay:750
})
ScrollReveal().reveal('.heading .subtitle',{
    ...scrollRevealOption,
    origin:"bootom",
    delay:750
})