from django.shortcuts import render, redirect
from django.contrib.auth import login
# from django.contrib import messages
from django.views import generic
from django.urls import reverse_lazy
from .forms import UserRegisterForm


class UserRegisterView(generic.CreateView):
    form_class = UserRegisterForm
    template_name = 'registration/register.html'
    success_url = reverse_lazy('login')

    def form_valid(self, form):
        user = form.save()
        login(self.request, user)
        return redirect('posts')
