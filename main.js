console.log('Decoteck JS Loaded ✅');

document.addEventListener('DOMContentLoaded', function() {

    const cards = document.querySelectorAll('.glass-card');
    console.log('Cards found:', cards.length);

    cards.forEach(card => {

        const maxTilt = 22;
        const liftZ = 60;

        card.addEventListener('mouseenter', () => {
            card.classList.add('is-hovering');
        });

        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateY = ((x - centerX) / centerX) * maxTilt;
            const rotateX = -((y - centerY) / centerY) * maxTilt;

            card.style.transform = `
                perspective(1600px)
                translateZ(${liftZ}px)
                rotateX(${rotateX}deg)
                rotateY(${rotateY}deg)
            `;
        });

        card.addEventListener('mouseleave', () => {
            card.classList.remove('is-hovering');
            card.style.transform = 'perspective(1600px) translateZ(0) rotateX(0) rotateY(0)';
        });
    });

});