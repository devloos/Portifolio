export function buildTagUrl(
  options = {
    text: 'TEXT REQUIRED',
    backgroundColor: 'red',
    style: null,
    logo: null,
  }
) {
  // https://img.shields.io/badge/javascript-%23323330.svg?&style=for-the-badge&logo=javascript
  const url = new URL(
    `https://img.shields.io/badge/${options.text}-${options.backgroundColor}`
  );

  if (options.style) {
    url.searchParams.append('style', options.style);
  }

  if (options.logo) {
    url.searchParams.append('logo', options.logo);
  }

  return url.href;
}
