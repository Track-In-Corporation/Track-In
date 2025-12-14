import "./bootstrap";
import "./layout/index.js";
import "./preloader.js";
import { QueryClient } from "./query-client.js";

import "./utils/passInput.js";

import "./pages/inventory/init.js";

import "./pages/transaction/init.js";
import "./pages/transaction/form.js";
import "./pages/transaction/status-dropdown.js";

import "./pages/users/init.js";
import "./pages/users/update-user.js";
import "./pages/users/create-user.js";
import "./pages/users/update-image.js";

import "./components/window.js";
import "./components/dropdown.js";
import "./components/input-dropdown.js";
import "./components/profile-popup.js";
import "./components/role-selector.js";
import "./components/delete-modal.js";
import "./components/password-input.js";
import { Toast } from "./components/toast.js";

// setTimeout(() => QueryClient.publish("users"), 0);
