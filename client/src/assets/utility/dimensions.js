export function isMobile() {
  return /iPhone|iPad|iPod|Android|webOS|BlackBerry|Windows Phone/i.test(
    navigator.userAgent,
  );
}

export function isMobileDimensions() {
  return window.innerWidth <= 400 && window.innerHeight <= 800;
}
