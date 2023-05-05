/* eslint-disable @typescript-eslint/no-empty-function */
import { Component, OnInit, ViewChild } from '@angular/core';
import { MatSidenav } from '@angular/material/sidenav';
import { Router } from '@angular/router';
import { Role } from 'src/app/modules/users/models/role.model';
import { User } from 'src/app/modules/users/models/user.model';
import { AuthenticationService } from 'src/app/modules/users/services/authentication.service';
import { UserService } from 'src/app/modules/users/services/user.service';
import { environment } from 'src/environments/environment';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss'],
})
export class HeaderComponent implements OnInit {
  @ViewChild(MatSidenav) sidenav!: MatSidenav;
  loggedIn = false;
  opened = false;
  currentUser: User | undefined;
  userRole: Role | undefined;

  constructor(
    private userService: UserService,
    private authService: AuthenticationService,
    private router: Router,
  ) {
    this.authService
      .getCurrentUser
      .subscribe(user => (this.currentUser = user));
    this.userRole = this.currentUser?.role;
    this.loggedIn = this.userRole ? true : false;
  }

  ngOnInit(): void {}

  public get accessLevels(): typeof Role {
    return Role;
  }

  isLoggedIn(): boolean {
    return this.loggedIn;
  }

  canSeeMenuItem(required: Role) {
    return (
      (this.currentUser || environment) &&
      this.userRole &&
      this.userRole >= required
    );
  }

  onLogout() {
    this.authService.logout();
    this.loggedIn = false;
    this.router.navigate(['/login']);
  }
}
