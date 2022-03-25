from django.shortcuts import render
from django.views.generic import ListView, DetailView, CreateView, UpdateView, DeleteView
from .forms import PostForm, EditForm
from django.urls import reverse_lazy
from .models import Post
from django.contrib.auth.mixins import LoginRequiredMixin
from datetime import datetime


# Create your views here.
class PostView(ListView):
    model = Post
    template_name = 'blog/index.html'
    ordering = ['-created_on']


class PostDetailView(DetailView):
    model = Post
    template_name = 'blog/post_details.html'


class PostAddView(LoginRequiredMixin, CreateView):
    model = Post
    form_class = PostForm
    template_name = 'blog/post_create.html'
    login_url = 'login'

    def form_valid(self, form):
        form.instance.author = self.request.user
        return super().form_valid(form)


class PostEditView(LoginRequiredMixin, UpdateView):
    model = Post
    form_class = EditForm
    template_name = 'blog/post_edit.html'
    login_url = 'login'

    # fields = ['headline', 'content']
    def form_valid(self, form):
        form.instance.author = self.request.user
        form.instance.created_on = datetime.now()
        return super().form_valid(form)


class PostDeleteView(LoginRequiredMixin, DeleteView):
    model = Post
    template_name = 'blog/post_delete.html'
    success_url = reverse_lazy('posts')
    login_url = 'login'
