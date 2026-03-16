const tagline = document.getElementById('tagline');
const originalText = 'Web Developer';
let i = 0;

function typeWriter() {
    if (i < originalText.length) {
        tagline.textContent = originalText.substring(0, i + 1);
        i++;
        setTimeout(typeWriter, 100);
    }
}

typeWriter();

const projects = [
    {
        title: 'E-commerce Website',
        description: 'A fully responsive online store built with HTML, CSS, and JavaScript.',
        image: 'https://via.placeholder.com/300x200/007bff/ffffff?text=E-commerce',
        link: '#'
    },
    {
        title: 'Weather App',
        description: 'A weather application that fetches data from an API and displays current conditions.',
        image: 'https://via.placeholder.com/300x200/28a745/ffffff?text=Weather+App',
        link: '#'
    },
    {
        title: 'Task Manager',
        description: 'A productivity app for managing daily tasks with local storage.',
        image: 'https://via.placeholder.com/300x200/ffc107/000000?text=Task+Manager',
        link: '#'
    }
];

const projectsContainer = document.getElementById('projects-container');

projects.forEach(project => {
    const card = document.createElement('div');
    card.className = 'project-card';

    card.innerHTML = `
        <img src="${project.image}" alt="${project.title}">
        <div class="project-card-content">
            <h3>${project.title}</h3>
            <p>${project.description}</p>
            <a href="${project.link}" target="_blank">View Project</a>
        </div>
    `;

    projectsContainer.appendChild(card);
});

const contactForm = document.getElementById('contact-form');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const subjectInput = document.getElementById('subject');
const messageInput = document.getElementById('message');
const nameError = document.getElementById('name-error');
const emailError = document.getElementById('email-error');
const subjectError = document.getElementById('subject-error');
const messageError = document.getElementById('message-error');

contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    let isValid = true;

    nameError.textContent = '';
    emailError.textContent = '';
    subjectError.textContent = '';
    messageError.textContent = '';

    if (nameInput.value.trim() === '') {
        nameError.textContent = 'Name is required';
        isValid = false;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailInput.value.trim() === '') {
        emailError.textContent = 'Email is required';
        isValid = false;
    } else if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Please enter a valid email address';
        isValid = false;
    }

    if (subjectInput.value.trim() === '') {
        subjectError.textContent = 'Subject is required';
        isValid = false;
    }

    if (messageInput.value.trim() === '') {
        messageError.textContent = 'Message is required';
        isValid = false;
    }

    if (isValid) {
        alert('Message sent successfully!');
        contactForm.reset();
    }
});

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});