from django.db import models
from datetime import datetime
from django.contrib.auth.models import User
from django.urls import reverse


# Create your models here.
class Post(models.Model):
    headline = models.CharField(max_length=200)
    author = models.ForeignKey(User, on_delete=models.CASCADE)
    content = models.TextField()
    created_on = models.DateTimeField(default=datetime.now())

    # headers_image = models.ImageField(null=True, blank=True, upload_to="images"

    def __str__(self) -> str:
        return self.headline

    def get_absolute_url(self):
        return reverse("post-detail", kwargs={"pk": self.pk})


class Comment(models.Model):
    post = models.ForeignKey(
        Post, on_delete=models.CASCADE)
    author = models.ForeignKey(User, on_delete=models.CASCADE)
    body = models.TextField()
    created_on = models.DateTimeField(default=datetime.now())

    def __str__(self) -> str:
        return '{} {}'.format(self.created_on, self.body)
