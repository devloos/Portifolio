export function joinQueryParams(url = '', params = []) {
  if (params.length > 0) {
    url += '?' + params.join('&');
  }

  return url;
}
