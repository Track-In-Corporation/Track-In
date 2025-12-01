import { API_URL } from "../config/constants";

export class API {
    static API_URL = API_URL;
    static getHeaders(isFormData) {
        const csrfToken = document.querySelector(
            'meta[name="csrf-token"]'
        )?.content;
        if (!csrfToken) throw new Error("Missing CSRF Token");

        let headers = {
            "X-CSRF-TOKEN": csrfToken,
            Accept: "application/json",
        };
        if (!isFormData) {
            headers["Content-Type"] = "application/json";
        }
        return headers;
    }

    static createError(status, errorData) {
        return Object.assign(new Error("Request failed"), {
            status,
            data: errorData,
        });
    }

    static async get(url, opts = {}) {
        const res = await fetch(this.API_URL + url, {
            headers: this.getHeaders(),
            method: "GET",
            ...opts,
        });

        const data = await res.json().catch(() => ({}));
        if (!res.ok) throw this.createError(res.status, data);

        return data;
    }

    static async post(url, body, opts = {}) {
        const headers = this.getHeaders(body instanceof FormData);
        const res = await fetch(this.API_URL + url, {
            headers,
            method: "POST",
            body: body instanceof FormData ? body : JSON.stringify(body),
            ...opts,
        });

        const data = await res.json().catch(() => ({}));
        if (!res.ok) throw this.createError(res.status, data);

        return data;
    }

    static async put(url, body, opts = {}) {
        const res = await fetch(this.API_URL + url, {
            headers: this.getHeaders(body instanceof FormData),
            method: "PUT",
            body: body instanceof FormData ? body : JSON.stringify(body),
            ...opts,
        });

        const data = await res.json().catch(() => ({}));
        if (!res.ok) throw this.createError(res.status, data);

        return data;
    }

    static async delete(url, opts = {}) {
        const res = await fetch(this.API_URL + url, {
            headers: this.getHeaders(),
            method: "DELETE",
            ...opts,
        });

        const data = await res.json().catch(() => ({}));
        if (!res.ok) throw this.createError(res.status, data);

        return data;
    }
}
