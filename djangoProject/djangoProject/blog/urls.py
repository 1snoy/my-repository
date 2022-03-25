from django.urls import path
from .views import PostAddView, PostView, PostDetailView, PostEditView, PostDeleteView, LikeView

urlpatterns = [
    path('', PostView.as_view(), name='posts'),
    path('post/create/', PostAddView.as_view(), name='post-create'),
    path('post/details/<int:pk>', PostDetailView.as_view(), name='post-detail'),
    path('post/edit/<int:pk>', PostEditView.as_view(), name='post-edit'),
    path('post/delete/<int:pk>/remove', PostDeleteView.as_view(), name='post-delete'),
    path('post/like/<int:pk>', LikeView, name='like-post'),

]
