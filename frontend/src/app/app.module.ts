import { UsersModule } from './modules/users/users.module';
import { SharedModule } from './shared/shared.module';
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { LoginModule } from './modules/login/login.module';
import {
  HTTP_INTERCEPTORS,
  HttpClient,
  HttpClientModule,
} from '@angular/common/http';
import { UserService } from './modules/users/services/user.service';
import { ErrorInterceptor, FakeBackendInterceptor, JwtInterceptor, fakeBackendProvider } from './shared/helpers';

import { MatTableModule } from '@angular/material/table' ;
@NgModule({
  declarations: [AppComponent],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    HttpClientModule,
    LoginModule,
    UsersModule,
    SharedModule,
    FormsModule,
    ReactiveFormsModule,
    MatTableModule,
  ],
  providers: [
    UserService,
    HttpClient,
    { provide: HTTP_INTERCEPTORS, useClass: JwtInterceptor, multi: true },
    { provide: HTTP_INTERCEPTORS, useClass: ErrorInterceptor, multi: true },
    // provider used to create fake backend
    // fakeBackendProvider,
  ],
  bootstrap: [AppComponent],
})
export class AppModule {}
