const projects = [
  {
    file: {
      type: 'video',
      src: '/tplos/portfolio/projects/andariego-1694729954020.mp4',
    },
    title: 'El Andariego',
    desc: "The use of Vue's Virtual DOM optimized rendering performance, reducing unnecessary updates. I also employed Vue's Pinia for structured state management and Vue Router for client-side routing, facilitating seamless navigation in your single-page application. MongoDB's flexible document-oriented data model provided efficient storage for dynamic content like menu items and customer orders.",
    tags: [
      {
        text: 'Javascript',
        logo: 'javascript',
      },
      {
        text: 'Vue js',
        logo: 'vuedotjs',
      },
      {
        text: 'Laravel',
        logo: 'laravel',
      },
      {
        text: 'MongoDB',
        logo: 'mongodb',
      },
      {
        text: 'Tailwind CSS',
        logo: 'tailwindcss',
      },
    ],
    site: 'https://www.elandariegotruck.com/',
    source: 'https://github.com/devloos/El-Andariego',
    featured: true,
  },
  {
    file: {
      type: 'video',
      src: '/tplos/portfolio/projects/street-fighter.mp4',
    },
    title: 'Street Fighter',
    desc: 'Street Fighter themed Tic Tac Toe game in Java featured multithreading to handle concurrent gameplay actions and networking through sockets for multiplayer functionality. Agile project management practices, including version control and regular team meetings, ensured efficient development and collaboration.',
    tags: [
      {
        text: 'Java',
        logo: null,
      },
      {
        text: 'JavaFX',
        logo: null,
      },
      {
        text: 'Maven',
        logo: 'apachemaven',
      },
    ],
    source: 'https://github.com/devloos/Street-Fighter',
    featured: true,
  },
  {
    file: {
      type: 'video',
      src: '/tplos/portfolio/projects/graphics-modeler.mp4',
    },
    title: 'Graphics Modeler',
    desc: "This project implements a C++ library for 2D graphical objects, emphasizing core programming concepts such as inheritance, aggregation, polymorphism, and more. It utilizes Qt's GUI capabilities, featuring a user-friendly interface for manipulating object properties and adheres to agile development methodologies, including Scrum practices and UML diagrams for design and implementation planning.",
    tags: [
      {
        text: 'C++',
        logo: 'cplusplus',
      },
      {
        text: 'QT',
        logo: 'qt',
      },
      {
        text: 'Linux',
        logo: 'linux',
      },
      {
        text: 'CMake',
        logo: 'cmake',
      },
    ],
    source: 'https://github.com/devloos/Graphics-Modeler',
    featured: true,
  },
  {
    file: {
      type: 'video',
      src: '/tplos/portfolio/projects/sales-system.mp4',
    },
    title: 'Sales System',
    desc: 'Gained proficiency in manual memory allocation, preventing memory leaks through proper memory deallocation. I also learned about the benefits of smart pointers, which facilitated ownership management and resource release through the RAII principle. Additionally, move semantics enhanced resource optimization and efficient data transfer, while the STL provided essential containers and algorithms for managing and processing data.',
    tags: [
      {
        text: 'C++',
        logo: 'cplusplus',
      },
      {
        text: 'Linux',
        logo: 'linux',
      },
      {
        text: 'CMake',
        logo: 'cmake',
      },
    ],
    source: 'https://github.com/devloos/Sales-System',
    featured: true,
  },
];

export default projects;
