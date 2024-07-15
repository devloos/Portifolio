import { useFetch } from '@vueuse/core';

const ENVIRONMENT = import.meta.env.VITE_ENV;
const APP_DEV = 'dev';

// TODO: learn useFetch and make this into a composable
// TODO: make toast

/**
 * @param {String} url
 * @param {RequestInit} options
 * @param {import('@vueuse/core').UseFetchOptions} fetchOptions
 */
export async function smartFetch(url, options, fetchOptions) {
  const { data } = await useFetch(url, options, {
    ...fetchOptions,
    updateDataOnError: true,
  }).json();

  if (data.value?.success) {
    return {
      data: data.value,
      failed: false,
    };
  }

  if (ENVIRONMENT === APP_DEV) {
    console.log(data.value);
  }

  if (data.value?.message) {
    console.log(data.value.message);
  }

  return {
    data: data.value,
    failed: true,
  };
}
