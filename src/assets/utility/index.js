export function buildTagUrl({
  text = 'TEXT REQUIRED',
  backgroundColor = 'red',
  style = null,
  logo = null,
}) {
  // https://img.shields.io/badge/javascript-%23323330.svg?&style=for-the-badge&logo=javascript
  const url = new URL(`https://img.shields.io/badge/${text}-${backgroundColor}`);

  if (style) {
    url.searchParams.append('style', style);
  }

  if (logo) {
    url.searchParams.append('logo', logo);
  }

  return url.href;
}
