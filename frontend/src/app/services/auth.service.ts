import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root',
})
export class AuthService {
  constructor(private http: HttpClient) {}

  login(userName: string, password: string, key?: string) {
    return this.http.post('auth/gettoken', {
      name: userName,
      password,
    });
  }

  get token(): string {
    return localStorage.getItem('token');
  }

  set token(token) {
    localStorage.setItem('token', token);
  }

  logout() {
    localStorage.removeItem('token');
  }
}
