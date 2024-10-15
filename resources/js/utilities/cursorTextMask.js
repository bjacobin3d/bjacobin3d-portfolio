import { gsap } from 'gsap';
import tinycolor from "tinycolor2"
import SplitType from 'split-type'

export function cursorTextMask (items, hexStart = "#FFF", radius = 200, type = "brighten", maxValue = 50) {
  items.forEach((item) => {
      new SplitType(item, {types: "words"}).words;
  });

  document.addEventListener('mousemove', (event) => {
    const mouseX = event.pageX;
    const mouseY = event.pageY;

    items.forEach((item) => {
      item.querySelectorAll(".word").forEach((word) => {
        const itemRect = word.getBoundingClientRect();
        const itemCenterX = itemRect.left + itemRect.width / 2 + window.scrollX;
        const itemCenterY = itemRect.top + itemRect.height / 2 + window.scrollY;

        const distance = Math.sqrt(
            Math.pow(mouseX - itemCenterX, 2) + Math.pow(mouseY - itemCenterY, 2)
        );

        const originalColor = tinycolor(hexStart);

        let fontColor = distance < radius ? gsap.utils.mapRange(
            0,
            radius,
            0,
            maxValue,
            Math.max(0, radius - distance)
        ) : 0;

        gsap.to(word, 
          {
            color: type == 'brighten' ? originalColor.brighten(fontColor) : originalColor.darken(fontColor), 
            duration: 0.5
          }
        );
      });
    });
  });
};
