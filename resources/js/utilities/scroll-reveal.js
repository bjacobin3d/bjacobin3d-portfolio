import { gsap } from 'gsap';
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

export function scrollReveal () {
  const targets = gsap.utils.toArray('[data-element="fade-container"]');

  if (targets && targets.length > 0) {
    targets.forEach((target) => {
      const fadeInUp = target.querySelectorAll('[data-element="fade-in-up"]');

      const scrollTrigger = {
        trigger: target,
        scrub: 1,
        start: 'top bottom-=20',
        end: 'top top+=100',
        toggleActions: 'restart pause resume pause'
      };

      if (fadeInUp && fadeInUp.length > 0) {
        gsap.to(fadeInUp, {
          opacity: 1,
          y: 0,
          stagger: {
            each: 0.25,
          },
          scrollTrigger,
        });
      }
    });
  }
};