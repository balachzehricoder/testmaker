// animation.js
gsap.registerPlugin(ScrollTrigger);

// Animation for the title
gsap.from("#section-title", {
  scrollTrigger: {
    trigger: "#section-title",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false
  },
  opacity: 0,
  y: -50,
  duration: 1
});

// Animation for the heading
gsap.from("#section-heading", {
  scrollTrigger: {
    trigger: "#section-heading",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false
  },
  opacity: 0,
  y: 30,
  duration: 1
});

// Animation for the paragraph
gsap.from("#section-paragraph", {
  scrollTrigger: {
    trigger: "#section-paragraph",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false
  },
  opacity: 0,
  y: 30,
  duration: 1
});

// Animation for the image
gsap.from("#section-image", {
  scrollTrigger: {
    trigger: "#section-image",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false
  },
  opacity: 0,
  scale: 0.8,
  duration: 1.5
});


// animation.js
gsap.registerPlugin(ScrollTrigger);

// GSAP animation for each step with enhanced effects
gsap.from("#step-1", {
  scrollTrigger: {
    trigger: "#step-1",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false,
  },
  opacity: 0,
  scale: 0.8,
  rotation: -10,
  duration: 1,
  ease: "power2.out"
});

gsap.from("#step-2", {
  scrollTrigger: {
    trigger: "#step-2",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false,
  },
  opacity: 0,
  scale: 0.8,
  rotation: -10,
  duration: 1,
  ease: "power2.out"
});

gsap.from("#step-3", {
  scrollTrigger: {
    trigger: "#step-3",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false,
  },
  opacity: 0,
  scale: 0.8,
  rotation: -10,
  duration: 1,
  ease: "power2.out"
});

gsap.from("#step-4", {
  scrollTrigger: {
    trigger: "#step-4",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false,
  },
  opacity: 0,
  scale: 0.8,
  rotation: -10,
  duration: 1,
  ease: "power2.out"
});

gsap.from("#finish", {
  scrollTrigger: {
    trigger: "#finish",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false,
  },
  opacity: 0,
  scale: 0.8,
  rotation: -10,
  duration: 1,
  ease: "power2.out"
});
// animation.js
gsap.registerPlugin(ScrollTrigger);

// GSAP animation for each section with staggered animations
gsap.from(".p-4", {
  scrollTrigger: {
    trigger: ".p-4",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false,
  },
  opacity: 0,
  scale: 0.5,
  rotation: 15,
  y: 50,
  stagger: 0.2,  // Adds delay between each item
  duration: 1,
  ease: "power3.out"
});

// Animation for icons to scale up and rotate
gsap.from(".inline-block", {
  scrollTrigger: {
    trigger: ".inline-block",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false,
  },
  opacity: 0,
  scale: 0,
  rotation: 90,
  duration: 1,
  ease: "power2.out"
});

// Animation for the title text
gsap.from("h1 span", {
  scrollTrigger: {
    trigger: "h1 span",
    start: "top 80%",
    end: "top 30%",
    scrub: true,
    markers: false,
  },
  opacity: 0,
  x: -50,
  duration: 1,
  ease: "power2.out"
});
