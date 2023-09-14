const projects = [
  {
    file: {
      type: 'video',
      src: '/tplos/portfolio/projects/andariego.mp4',
    },
    title: 'El Andariego',
    desc: 'El-Andariego is a renowned Mexican food truck. This website acts as a valuable resource for customers, providing comprehensive information and serving as a point of contact.',
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
    desc: 'This was an Agile Development project created to use the basics of C++ alongside the Graphical User Interface library Qt to create a UI and render shapes.',
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
    desc: 'This terminal-based POS (Point of Sale) system is designed to operate without relying on any external libraries, offering a lightweight and self-contained solution.',
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
