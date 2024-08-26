import * as qs from 'qs';

export async function useSmartFetch({
  url = null,
  method = 'GET',
  params = null,
  data = null,
  notifyOnSuccess = false,
  notifyOnFailure = false,
}) {
  if (url === null) {
    throw new Error('Url must be provided.');
  }

  if (params) {
    url += '?' + qs.stringify(params);
  }

  const response = await fetch(url, {
    method,
    ...(data && { headers: { 'Content-Type': 'application/json' } }),
    ...(data && { body: JSON.stringify(data) }),
  });

  const jsonData = await response.json();

  if (response.ok) {
    if (notifyOnSuccess) {
      console.log(jsonData.message);
    }
  } else {
    // todo: analytics, log, etc...
    if (notifyOnFailure) {
      console.log(jsonData.message);
    }
  }

  return jsonData;
}
