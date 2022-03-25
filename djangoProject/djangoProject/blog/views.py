from django.http import HttpResponse, HttpResponseRedirect
from django.shortcuts import render
from django.views.generic import ListView, DetailView, CreateView, UpdateView, DeleteView
from .forms import PostForm, EditForm, CommentAddForm
from django.urls import reverse_lazy, reverse
from .models import Post, Comment
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

    def get_context_data(self, **kwargs):
        context = super().get_context_data()
        stuff = Post.objects.get(id=self.kwargs['pk'])
        total_likes = stuff.total_likes()
        com = Comment.objects.filter(post=self.get_object())
        context['total_likes'] = total_likes
        context['comments'] = com
        context['comment_form'] = CommentAddForm(instance=self.request.user)
        return context
    
    
    def post(self, request, *args, **kwargs):
        new_comment = Comment(body=request.POST.get('body'),
                                    author=self.request.user,
                                    post=self.get_object())
        new_comment.save()
        return self.get(self, request, *args, **kwargs)

    





    


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

def LikeView(request, pk):
    post = Post.objects.get(id=pk)
    if post.likes.filter(id=request.user.id).exists():
        post.likes.remove(request.user)
    else:
        post.likes.add(request.user)
    return HttpResponseRedirect(reverse('post-detail', args=[str(pk)]))